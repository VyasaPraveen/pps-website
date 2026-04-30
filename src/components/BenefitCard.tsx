import type { Benefit } from "@/lib/site";
import { iconMap } from "./Icons";

export function BenefitCard({ benefit }: { benefit: Benefit }) {
  const Icon = iconMap[benefit.icon];
  return (
    <div className="card-hover relative rounded-2xl bg-white p-6 border border-solar-100 shadow-sm">
      <span className="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-solar-100 text-solar-600 group-hover:scale-110 transition-transform">
        <Icon size={24} />
      </span>
      <h3 className="mt-4 text-base font-semibold text-sky-deep">{benefit.title}</h3>
      <p className="mt-1.5 text-sm text-slate-600 leading-relaxed">{benefit.description}</p>
    </div>
  );
}
