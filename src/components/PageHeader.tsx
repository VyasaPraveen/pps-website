import Link from "next/link";
import { ArrowRightIcon } from "./Icons";

type Crumb = { label: string; href?: string };

type Props = {
  title: string;
  description?: string;
  crumbs?: Crumb[];
};

export function PageHeader({ title, description, crumbs }: Props) {
  return (
    <section className="relative overflow-hidden hero-gradient">
      <div className="absolute inset-0 grid-bg opacity-30" aria-hidden />
      <div className="absolute -top-24 -right-24 h-72 w-72 rounded-full sun-gradient opacity-40 blur-3xl" aria-hidden />
      <div className="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-16 md:py-20">
        {crumbs && crumbs.length > 0 && (
          <nav aria-label="Breadcrumb" className="mb-4">
            <ol className="flex flex-wrap items-center gap-2 text-xs font-medium text-slate-600">
              {crumbs.map((c, i) => (
                <li key={c.label} className="inline-flex items-center gap-2">
                  {c.href ? (
                    <Link href={c.href} className="hover:text-solar-600 transition-colors">
                      {c.label}
                    </Link>
                  ) : (
                    <span className="text-slate-800">{c.label}</span>
                  )}
                  {i < crumbs.length - 1 && (
                    <ArrowRightIcon size={12} className="text-solar-400" />
                  )}
                </li>
              ))}
            </ol>
          </nav>
        )}
        <h1 className="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight text-sky-deep max-w-3xl">
          {title}
        </h1>
        {description && (
          <p className="mt-4 text-base md:text-lg text-slate-700 max-w-2xl leading-relaxed">
            {description}
          </p>
        )}
      </div>
    </section>
  );
}
