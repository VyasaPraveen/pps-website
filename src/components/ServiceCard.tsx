import Link from "next/link";
import type { Service } from "@/lib/site";
import { ArrowRightIcon, CheckIcon, iconMap } from "./Icons";

export function ServiceCard({ service }: { service: Service }) {
  const Icon = iconMap[service.icon];
  return (
    <article
      id={service.slug}
      className="card-hover group relative overflow-hidden rounded-3xl bg-white p-7 shadow-[0_2px_20px_-6px_rgba(15,23,42,0.08)] border border-solar-100 scroll-mt-28"
    >
      <div className="absolute -right-10 -top-10 h-32 w-32 rounded-full sun-gradient opacity-10 group-hover:opacity-25 transition-opacity" />
      <div className="relative">
        <span className="inline-flex h-14 w-14 items-center justify-center rounded-2xl sun-gradient text-white shadow-lg">
          <Icon size={28} />
        </span>
        <h3 className="mt-5 text-xl font-bold text-sky-deep">{service.title}</h3>
        <p className="mt-2 text-sm text-slate-600 leading-relaxed">{service.short}</p>
        <ul className="mt-4 space-y-2">
          {service.highlights.map((h) => (
            <li key={h} className="flex items-start gap-2 text-sm text-slate-700">
              <CheckIcon size={16} className="text-eco-600 mt-0.5 shrink-0" />
              <span>{h}</span>
            </li>
          ))}
        </ul>
        <Link
          href={`/services#${service.slug}`}
          className="mt-5 inline-flex items-center gap-1 text-sm font-semibold text-solar-600 hover:text-solar-700"
        >
          Learn more
          <ArrowRightIcon size={16} className="group-hover:translate-x-1 transition-transform" />
        </Link>
      </div>
    </article>
  );
}
