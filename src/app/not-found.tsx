import Link from "next/link";
import { ArrowRightIcon, SunIcon } from "@/components/Icons";

export default function NotFound() {
  return (
    <section className="hero-gradient relative overflow-hidden">
      <div className="absolute inset-0 grid-bg opacity-30" aria-hidden />
      <div className="relative mx-auto max-w-3xl px-4 sm:px-6 lg:px-8 py-24 md:py-32 text-center">
        <span className="inline-flex h-20 w-20 items-center justify-center rounded-full sun-gradient text-white shadow-lg">
          <SunIcon size={48} className="animate-solar-spin" />
        </span>
        <h1 className="mt-8 text-5xl md:text-7xl font-bold text-sky-deep">404</h1>
        <p className="mt-3 text-xl md:text-2xl font-semibold text-solar-700">
          Looks like this page took a sun-set.
        </p>
        <p className="mt-3 text-slate-600 max-w-lg mx-auto">
          The page you&apos;re looking for doesn&apos;t exist. Let&apos;s get you back to clean energy.
        </p>
        <Link
          href="/"
          className="mt-8 btn-primary inline-flex items-center gap-2 rounded-full px-6 py-3 text-sm font-semibold"
        >
          Back to Home
          <ArrowRightIcon size={18} />
        </Link>
      </div>
    </section>
  );
}
